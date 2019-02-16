<template>
    <input type="text" @keyup="beautify" v-model="localModel" :placeholder="placeholder || 'input'" :class="classes"/>
</template>
<script>
    export default {
        props: ['model', 'placeholder', 'classes'],
        data () {
            return {
                localModel: ""
            }
        },
        computed: {
            numberValue () {
                return this.localModel.replace(/,/gi, '');
            }
        },
        watch: {
            localModel (oldVal) {
                let parts = this.model.split('.');
                if (parts.length === 1 || parts.length === 0) {
                    this.$parent[this.model] = this.numberValue;

                    return;
                }

                let currentObj = null;
                parts.forEach(p => {
                    if(currentObj === null) {
                        currentObj = this.$parent[p];
                    } else {
                        if (typeof currentObj[p] === "object") currentObj = currentObj[p];
                        else currentObj[p] = this.numberValue;
                    }
                });
            }
        },
        methods: {
            beautify (event) {
                event.srcElement.onkeyup = (ev) => {
                    let selection = window.getSelection().toString();
                    if (selection !== '') {
                        return;
                    }
                    // When the arrow keys are pressed, abort.
                    if ( $.inArray( ev.keyCode, [38, 40, 37, 39] ) !== -1 ) {
                        return;
                    }

                    let $this = ev.target;
                    // Get the value.
                    let input = $this.value;

                    input = input.replace(/[\D\s\._\-]+/g, "");
                    input = input ? parseInt(input, 10) : 0;
                    $this.value = this.localModel = ( input === 0 ) ? "" : input.toLocaleString( "en-US" );;
                }
            }
        }
    }
</script>
