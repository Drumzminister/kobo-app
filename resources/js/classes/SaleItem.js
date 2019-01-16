import {toast} from "../helpers/alert";
window._ = require('lodash');

class SaleItem
{
    constructor (saleId, inventory = null) {
        this.inventory_id = "";
        this._id = null;
        this._sale_id = saleId;
        this.description = "";
        this._quantity = null;
        this.sales_price =  0;
        this.total_price = "";
        this.sale_channel_id = "";
        this._inventory = inventory;
        this._isValid = false;
        this._END_POINT = require('jquery')(document).baseURI;
        this.debounceItemSaving = window._.debounce(this.saveItem, 500);
    }

    get isValid () {
        return !this._isValid || this.inventory_id !== ""
            || this.description !== "" || this._quantity > 0
            || this.sale_channel_id !== "" || this.total_price !== ""
            || this.sales_price !== "";
    }

    set quantity(quantity) {
        if (this.inventory_id === "") return;
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

    get quantity() {
        return this._quantity;
    }
    totalPrice () {
        return this._quantity * this.sales_price;
    }
    getInventoryQuantity () {
        return this.inventory_id === "" ? 0 : this._inventory.quantity;
    }
    set inventory(inventory) {
        this._inventory = inventory;
    }

    saveItem () {
        console.log(this.isValid);
        return;
        let data = this.getItemData();
        let self = this;
        window.axios.post(this._END_POINT, data)
            .then((response) => {
                if (response.data.status === "success") {
                    self._id = response.data.data.id;
                }
            })
            .catch();
    }
    getItemData () {
        return {
            sale_id: this._sale_id,
            inventory_id: this.inventory_id,
            sale_channel_id: this.sale_channel_id,
            quantity: this.quantity,
            sales_price: this.sales_price,
            total_price: this.totalPrice(),
            description: this.description
        }
    }
}

export default SaleItem;