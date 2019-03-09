<template>
    <div class="col-md-4 img-in">
        <img src="/img/person.png" alt="client logo" srcset="" class="rounded-circle img-fluid img-circle">
        <div class="overlay">
            <div class="text form-group">
                <input type="file" class="form-control-file" accept="image/*" name="avatar" @change="previewImage('profilePicture', '#profilePicturePreview')" id="profilePicture">
            </div>
        </div>

        <h5 class="h5 px-4 py-2 ">Add Photo</h5>
    </div>
</template>
<script>
    export default {
        methods: {
            previewImage: function (input, target) {
                let fileInput = document.getElementById(input);
                this.processImagePreview(fileInput, target);
            },
            processImagePreview: function (input, target) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $(target).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            },
        }
    };
</script>
