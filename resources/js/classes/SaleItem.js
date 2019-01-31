import {toast} from "../helpers/alert";
import API from "./API";
window._ = require('lodash');

class SaleItem
{
    /**
     * Constructor
     *
     * @param saleId
     * @param inventory
     */
    constructor (saleId, inventory = null) {
        this._id = null;
        this.type = 'normal';
        this.saved = false;
        this.created_at = "";
        this.description = "";
        this._quantity = null;
        this.sales_price =  0;
        this.total_price = "";
        this._isValid = false;
        this.inventory_item_id = "";
        this._sale_id = saleId;
        this.processing = false;
        this.sale_channel_id = "";
        this._inventory = inventory;
        this.debounceItemSaving = window._.debounce(this.saveItem, 500);
        this.reversedItem = null;
    }

    get id () {
        return this._id;
    }

    /**
     * Evaluates the Item if its valid
     *
     * @returns {boolean}
     */
    get isNotValid () {
        if (this.type === 'reversed') return false;
        return this.inventory_item_id === ""
            || this.description === "" || parseInt(this._quantity) <= 0
            || this.sale_channel_id === "" || this.totalPrice() <= 0
            || this.sales_price === "";
    }

    /**
     * Mutates the Quantity of this Item
     *
     * @param quantity
     */
    set quantity(quantity) {
        if (this.type === 'reversed') {
            this._quantity = quantity;
        } else {
            if (this.inventory_item_id === "") return;
            let inventoryQuantity = parseInt(this.getInventoryQuantity());

            if (parseInt(quantity) < 0) {
                this._isValid = false;
                toast(`Minimum number of quantity is 1`, 'error');
            }

            if (parseInt(quantity) > inventoryQuantity) {
                this._isValid = false;
                toast(`This quantity cannot be greater than the inventory quantity which is ${inventoryQuantity}`, 'error');
                this._quantity = null;
            } else {
                this._quantity = quantity;
            }
        }
    }

    /**
     * Gets Item Quantity
     *
     * @returns {null}
     */
    get quantity() {
        return this._quantity;
    }

    /**
     * Computes Total Item Price
     *
     * @returns {number}
     */
    totalPrice () {
        return this._quantity * this.sales_price;
    }

    /**
     * Get Inventory Quantity of which this Item is linked to
     *
     * @returns {*}
     */
    getInventoryQuantity () {
        return this.inventory_item_id === "" ? 0 : this._inventory.quantity;
    }

    /**
     * Links the Item to inventory
     *
     * @param inventory
     */
    set inventory(inventory) {
        this._inventory = inventory;
    }

    /**
     * Get the Inventory the SaleItem is linked to
     */
    get inventory () {
        return this._inventory;
    }

    set id(id) {
        this._id = id;
    }

    /**
     * Saves the Item in the Database
     */
    saveItem () {
        this.saved = false;
        if(this.isNotValid) return;
        this.processing = true;
            if (this._id) {
                this.updateItemOnDatabase();
            } else {
                this.createItemOnDatabase();
            }
    }

    get isReversed () {
        return this.type === 'reversed';
    }

    /**
     * Creates the Item in the Database
     */
    createItemOnDatabase () {
        let data = this.getItemData();
        let self = this;
        let api = new API({ baseUri: 'https://kobo.test/api/client'});

        api.createEntity({ name: 'saleItem'});
        api.endpoints.saleItem.create(data)
            .then(({ data }) => {
                if (data.status === "success") {
                    self.saved = true;
                    self._id = data.data.id;
                    self.processing = false;
                    self.created_at = data.data.created_at;
                } else {
                    this.processing = false;
                    toast(data.message, 'error');
                }
            })
            .catch((err) => console.log(err));
    }

    updateItemOnDatabase () {
        let data = this.getItemData();
        let self = this;
        let api = new API({ baseUri: 'https://kobo.test/api/client'});

        api.createEntity({ name: 'saleItem'});
        api.endpoints.saleItem.update(data)
            .then(({ data }) => {
                if (data.status === "success") {
                    self.saved = true;
                    self._id = data.data.id;
                    self.processing = false;
                }
            })
            .catch((err) => console.log(err));
    }

    deleteItemOnDatabase () {
        if (!this._id) return;

        this.processing = true;
        let data = this.getItemData();
        let api = new API({ baseUri: 'https://kobo.test/api/client' });

        api.createEntity({ name: 'saleItem' });
        return api.endpoints.saleItem.delete(data);
    }

    /**
     * Gets the Item Data in (what we need)
     *
     * @returns {{sale_id: *, sale_channel_id: string, quantity: *, total_price: number, inventory_id: string, sales_price: number, description: string, id: (null|*)}}
     */
    getItemData () {
        return {
            id: this._id,
            type: this.type,
            reversed_item_id: this.reversedItem ? this.reversedItem.id : null,
            sale_id: this._sale_id,
            inventory_item_id: this.inventory_item_id,
            sale_channel_id: this.sale_channel_id,
            quantity: this.quantity,
            sales_price: this.sales_price,
            total_price: this.totalPrice(),
            description: this.description
        }
    }
}

export default SaleItem;