<template>
    <input type="text" @keyup="beautify" v-model="localModel" :placeholder="options.placeholder || 'Money Input'" :class="classes"/>
</template>
<script>
    export default {
        props: ['model','initial', 'options', 'classes'],
        data () {
            return {
                localModel: "",
            }
        },
        computed: {
            numberValue () {
                return this.localModel.replace(/,/gi, '');
            }
        },
        mounted() {
            if (this.initial) this.localModel = Number(this.initial).toLocaleString( "en-US" );
        },
        watch: {
            initial () {
                this.localModel = Number(this.initial).toLocaleString( "en-US" );
            },
            localModel (oldVal) {
                let parts = this.model.split('.');
                if (parts.length === 1 || parts.length === 0) {
                    this.$parent[this.model] = this.numberValue;

                    return;
                }

                let currentObj = null;
                parts.forEach(p => {
                    if(currentObj === null) {
                        if (p.includes("[") && p.endsWith ("]")) {
                            let parts = p.split('[');
                            currentObj = this.$parent [parts[0]] [Number(parts[1].substring(0, parts[1].length-1 ))];
                        } else {
                            currentObj = this.$parent[p];
                        }
                    } else {
                        if (null !== currentObj[p] && typeof currentObj[p] === "object") {
                            if (p.includes("[") && p.endsWith ("]")) {
                                let parts = p.split('[');
                                currentObj = this.$parent [parts[0]] [Number(parts[1].substring(0, parts[1].length-1 ))];
                            } else {
                                currentObj = this.$parent[p];
                            }
                        } else {
                            currentObj[p] = this.numberValue;
                        }
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
