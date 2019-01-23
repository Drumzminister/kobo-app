import {toast} from "../helpers/alert";

export const saleItem = {
    inventory_id: "",
    description:  "",
    quantity:    null,
    set mutateQuantity(quantity) {
        if (this.inventory_id === "") return;
        let inventoryQuantity = parseInt(this.getInventoryQuantity());
        if (parseInt(quantity) > inventoryQuantity || parseInt(quantity) < 0) {
            toast(`This quantity cannot be greater than the inventory quantity which is ${inventoryQuantity}`, 'error');
            this.quantity = null;
        } else {
            this.quantity = quantity;
        }
    },
    get mutateQuantity() {
        return this.quantity;
    },
    sales_price:        0,
    total_price:        "",
    sale_channel_id:    "",
    totalPrice () {
        return this.quantity * this.sales_price;
    },
    getInventoryQuantity () {
        return this.inventory_id === "" ? 0 : that.getInventory(this.inventory_id).quantity;
    }
}