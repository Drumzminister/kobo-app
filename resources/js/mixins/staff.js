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
        },
        staff: [],
        staffSearchInput: '',
        StaffInformation: {
            name: '',
            id: '',
            role: '',
            experience: '',
            dateOfEmployment: '',
            comment: '',
        },
    },
    created() {
        axios.get('/client/staff/all-staff').then(res => {
            this.staff = res.data;
        })
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
        },

        searchStaff() {
            axios.get(`/client/staff/search?param=${this.staffSearchInput}`).then(res => {
                this.staff = res.data;
            });
        },
        staffModal(staff) {
            this.StaffInformation.id = staff.id;
            this.StaffInformation.name = staff.first_name + ' ';
            this.StaffInformation.name += staff.last_name;
            this.StaffInformation.role = staff.role;
            this.StaffInformation.experience = staff.years_of_experience;
            this.StaffInformation.dateOfEmployment = staff.employed_date;
            this.StaffInformation.comment = staff.comment;
        },

        staffStatusFilter(){
            if (!this.staffActive) {
                this.staffActive = 1;
            } else {
                this.staffActive++;
            }

            if(!this.allStaff) {
                this.allStaff = [...this.staff]
            }
            if (this.staffActive % 2 === 1 ) {
                this.staff = this.allStaff.filter(staff => staff.isActive === 1)
            } else {
                this.staff = this.allStaff.filter(staff => staff.isActive === 0)
            }

            // let inactiveStaff = this.staff.filter(staff => staff.isActive === 0);
            // this.activeStaff = ! this.activeStaff;
            // let activeStaff = this.staff.filter(staff => staff.isActive === 1);
        }

// }

    }
};
