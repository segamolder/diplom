<template>
    <div id="grid">
        <div class="header">
            <input type="text" v-model="image_url" placeholder="URL изображения">
            <button v-on:click='insert_image'>Изображение фона</button>
            <input type="text" v-model="bg_image_height" placeholder="height: %">
            <input type="text" v-model="bg_image_width" placeholder="width: %">
            <input type="text" v-model="input_text" placeholder="Введите текст">
            <button v-on:click='insert_text'>Добавить текст</button>
        </div>
        <div class="nav">

        </div>
        <div class="main">
            <div id="banner-template" v-bind:style=" {
                                                            backgroundColor: '#ffffff', 
                                                            display: 'block',
                                                            position: 'relative',
                                                            width: bg_image_width + '%',
                                                            height: bg_image_height + '%',
                                                            backgroundRepeat: 'no-repeat'
                                                        }">
                <vue-draggable-resizable class-name="backgroungImage" parent=".main" @dragging="onDrag" @resizing="onResize">
                    <img v-bind:src="image_url" alt="" v-bind:style="{position: 'relative', width: width + 'px', height: height + 'px'}">
                </vue-draggable-resizable>
                <p>fghfhg</p>
            </div>


        </div>
    </div>
</template>

<script>
    import VueDraggableResizable from 'vue-draggable-resizable';
    import html2canvas from 'html2canvas';
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
                y: 0,
                input_text: '',
                banner_template_dom: ''
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
                html2canvas(this.banner_template_dom).then(function(canvas) {
                    document.getElementsByClassName('main')[0].appendChild(canvas);
                });
            },
            insert_text() {
                
                
            }
        },
        created() {
            this.bg_image_height = 50;
            this.bg_image_width = 50;
        },
        updated() {
            this.banner_template_dom = document.getElementById('banner-template');
        }
    }

</script>
