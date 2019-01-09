export const staffApp = {
    data: {
        staffForm: {
            first_name: '',
            last_name: '',
            role: '',
            employed_date: '',
            salary: '',
            email: '',
            phone: '',
            years_of_experience: '',
            comment: '',
            avatar: ''
        }
    },
    methods: {
        createStaff(evt) {
            evt.preventDefault();
            axios.post('/client/staff/single-staff/add', this.staffForm).then(res => {
              swal('Success', res.data.message, 'success');
              this.staffForm = '';
            }).catch(err => {
                swal("Oops", "An error occurred when creating this staff", "error");
            })
        }
    }
};
