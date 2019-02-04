class Bank {
    constructor () {
        this.account_name = "";
        this.account_number = "";
        this.bank_name = "";
        this.account_balance = null;
        this._saved = false;
    }

    /**
     * Evaluates the Item if its valid
     *
     * @returns {boolean}
     */
    get isNotValid () {
        return this.bank_name === ""
            || this.account_balance === null || parseInt(this.account_balance) <= 0
            || this.account_number === "";
    }

    saveBank () {

    }

    getBankData () {
        return {
            bank_name: this.bank_name,
            account_name: this.account_name,
            account_number: this.account_number,
            account_balance: this.account_balance,
        }
    }
}