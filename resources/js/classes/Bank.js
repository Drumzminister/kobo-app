class Bank
{
    constructor (id = null) {
        this.account_name = "";
        this.account_number = "";
        this.bank_name = "";
        this.account_balance = null;
        this.saved = false;
        this.id = id;
    }

    /**
     * Evaluates the Item if its valid
     *
     * @returns {boolean}
     */
    get isNotValid () {
        return this.bank_name === ""
            || this.account_balance === null || parseInt(this.account_balance) <= 0
            || this.account_number === "" || this.account_number !== 10;
    }

    saveBank () {
        if (this.isNotValid) {
            return false;
        }

        if (!this.id) {
            return axios.post(route('bank.add'), this.getBankData());
        } else {
            return axios.patch(route('bank.update'), this.getBankData());
        }
    }

    getBankData () {
        return {
            id: this.id,
            bank_name: this.bank_name,
            account_name: this.account_name,
            account_number: this.account_number,
            account_balance: this.account_balance || 0
        }
    }

    transfer (amount) {
        this.account_balance = parseFloat(this.account_balance) - parseFloat(amount);

        return amount;
    }

    receive (amount) {
        this.account_balance = parseFloat(this.account_balance) + parseFloat(amount);
    }
}

export default Bank;