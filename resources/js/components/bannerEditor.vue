<template>
    <div id="grid">
        <div class="header">
            <input type="text" v-model="image_url" placeholder="URL изображения">
            <button v-on:click='insert_image'>Изображение фона</button>
            <input type="text" v-model="bg_image_height" placeholder="height: %">
            <input type="text" v-model="bg_image_width" placeholder="width: %">
        </div>
        <div class="nav">

        </div>
        <div class="main">
            <div class="banner-template" v-bind:style=" {
                                                            backgroundColor: '#ffffff', 
                                                            display: 'block',
                                                            position: 'relative',
                                                            width: bg_image_width + '%',
                                                            height: bg_image_height + '%',
                                                            backgroundRepeat: 'no-repeat'
                                                        }">
                <vue-draggable-resizable class-name="backgroungImage" :w="10" :h="10" parent=".banner-template">
                    <img v-bind:src="image_url" alt="" v-bind:style="{position: 'relative', width: width + 'px', height: height + 'px'}">
                </vue-draggable-resizable>
            </div>


        </div>
    </div>
</template>

<script>
    import VueDraggableResizable from 'vue-draggable-resizable'
    export default {
        name: 'banner_editor',
        data() {
            return {
                image_url: '',
                bg_image_height: '',
                bg_image_width: '',
                width: 0,
                height: 0,
                x: 0,
                y: 0
            }
        },
        methods: {
            onResize: function(x, y, width, height) {
                this.x = x
                this.y = y
                this.width = width
                this.height = height
            },
            onDrag: function(x, y) {
                this.x = x
                this.y = y
            },
            insert_image() {

            },
            update_template() {

            }
        },
        created() {
            this.bg_image_height = 100;
            this.bg_image_width = 100;
        }
    }

</script>
