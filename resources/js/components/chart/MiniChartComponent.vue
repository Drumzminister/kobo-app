<template>
    <div class="row">
        <div class="col-md-3">
            <h5 class="h5">Monthly sales</h5>
        </div>
        <div class="col-md-3">
            <div class="form-check form-check-inline">
                <label><input type="radio" name="select"/><span>D</span></label>
            </div>
            <div class="form-check form-check-inline">
                <label><input type="radio" name="select"/><span>W</span></label>
            </div>
            <div class="form-check form-check-inline">
                <label><input type="radio" name="select"/><span>M</span></label>
            </div>
            <div class="form-check form-check-inline">
                <label><input type="radio" name="select"/><span>Y</span></label>
            </div>

        </div>
        <div class="col-md-6 row">
            <div class="form-group col">
                <select id="inputState" class="form-control btn-loginn">
                    <option selected>Start Date</option>
                    <option>January</option>
                    <option>Feburary</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                </select>
            </div>
            <div class="form-group col">
                <select id="inputState" class="form-control btn-loginn">
                    <option selected class>End Date</option>
                    <option>January</option>
                    <option>Feburary</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>
