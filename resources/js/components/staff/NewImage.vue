<template>
    <div class="col-md-4 img-in text-center">
        <h5 class="h5">Add Photo</h5>
        <div class="text-center">
            <img src="/img/person.png" alt="client logo" srcset="" id="profilePicturePreview" class="rounded-circle img-fluid img-circle">
            <!--<div class="overlay">-->
                <div class="">
                    <input type="file" class="form-control-file" accept="image/*" :name="options.name" @change="previewImage('profilePicture', '#profilePicturePreview')" id="profilePicture" hidden>
                    <label for="profilePicture" class="choose-image-label">
                        <i class="fa fa-camera"></i>
                    </label>
                </div>
            <!--</div>-->
            <span v-if="error !== ''" class="invalid-feedback" role="alert" style="display: block;">
                <strong class="text-center">{{ error }}</strong>
            </span>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['options', 'error'],
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
