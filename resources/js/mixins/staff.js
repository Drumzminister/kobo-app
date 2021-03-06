import {toast} from "../helpers/alert";
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
        staffSearchInput: '',
        StaffInformation: {
            name: '',
            id: '',
            role: '',
            experience: '',
            dateOfEmployment: '',
            comment: '',
            phone: ''
        },
        messageText: '',
        staff: window.all_staff,
    },

    methods: {
        getAndProcessImage(event) {
            toast('Image is uploading ...', 'info');
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append('file', file);
            axios.post('/client/staff/imageUpload', formData).then(res => {
                    toast('Image has successfully uploaded', 'success');
                    let data = res.data.data;
                    this.staffForm.avatar = `https://s3.us-east-2.amazonaws.com/koboapp/${data}`
            });
        },
        createStaff(evt) {
            evt.preventDefault();
            axios.post('/client/staff/single-staff/add', this.staffForm).then(res => {
                swal({type: 'success', title: 'Success', text: res.data.message, timer: 3000, showConfirmButton: false}).then(() => {
                    location.reload(true);
                })
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
            this.StaffInformation.salary = staff.salary;
            this.StaffInformation.avatar = staff.avatar;
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
        },
        validateInput () {
            if (Number(this.staffForm.years_of_experience) > 50){
                toast('Years of experience cannot be above 50', 'error');
                this.staffForm.years_of_experience = 50;
            }
            if(Number(this.staffForm.phone.length > 11)) {
                toast('Phone number cannot be greater than 11', 'error');
                this.staffForm.phone = this.staffForm.phone.slice(0, this.staffForm.phone.length -1)
            }
        },
        deactivateStaff(staff) {
            axios.post(`/client/staff/deactivate/${staff.id}`).then(res => {
                swal({type: 'success', title: 'Success', text: res.data.message, timer: 3000, showConfirmButton: false}).then(() => {
                    location.reload(true);
                })
            }).catch(error => {
                toast(error.data.message,'error')
            });
        }
    },
};
