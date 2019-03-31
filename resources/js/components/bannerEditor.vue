<template>
    <div id="grid">
        <div class="header">
            <!---->
            <input type="text" v-model="image_url" placeholder="URL изображения">
            <button v-on:click='insert_image'>Изображение фона</button>
            <input type="text" v-model="bg_template_height" placeholder="height: %">
            <input type="text" v-model="bg_template_width" placeholder="width: %">
            <input type="text" v-model="input_text" placeholder="Введите текст">
            <button v-on:click='insert_text'>Добавить текст</button>
        </div>
        <div class="nav">
            <form id="uploadForm" name="uploadForm" enctype="multipart/form-data">
                <input type="file" id="files" name="files" multiple>
                <input type=button value=Upload @click="this.uploadFiles">
            </form>

        </div>
        <div class="main">
            <div id="banner-template" v-bind:style=" {
                                                            backgroundColor: '#ffffff', 
                                                            display: 'block',
                                                            position: 'relative',
                                                            width: bg_template_width + 'px',
                                                            height: bg_template_height + 'px',
                                                            backgroundRepeat: 'no-repeat'
                                                        }">
                <vue-draggable-resizable class-name="backgroungImage" :w=bg_template_width :h=bg_template_height parent=".main" @dragging="onDrag_image" @resizing="onResize_image">
                    <img v-bind:src="image_url" alt="" v-bind:style="{position: 'relative', width: image_width + 'px', height: image_height + 'px'}">
                </vue-draggable-resizable>

                <vue-draggable-resizable class-name="backgroungText" :w=30 :h=30 parent=".main" @dragging="onDrag_text" @resizing="onResize_text">
                    <p id="textFont">{{output_text}}</p>
                </vue-draggable-resizable>
            </div>


        </div>
    </div>
</template>

<script>
    import VueDraggableResizable from 'vue-draggable-resizable';
    import html2canvas from 'html2canvas';
    import axios from 'axios';
    export default {
        name: 'banner_editor',
        data() {
            return {
                image_url: '',
                bg_template_height: '',
                bg_template_width: '',
                image_width: 0,
                image_height: 0,
                image_x: 0,
                image_y: 0,
                text_width: 0,
                text_height: 0,
                text_x: 0,
                text_y: 0,
                input_text: '',
                output_text: '',
                banner_template_dom: ''
            }
        },
        methods: {
            onResize_image: function(x, y, width, height) {
                this.image_x = x
                this.image_y = y
                this.image_width = width
                this.image_height = height
            },
            onDrag_image: function(x, y) {
                this.image_x = x
                this.image_y = y
            },
            onResize_text: function(x, y, width, height) {
                this.text_x = x
                this.text_y = y
                this.text_width = width
                this.text_height = height
                document.getElementById('textFont').style.fontSize = this.text_height / 2 + 'px'
            },
            onDrag_text: function(x, y) {
                this.text_x = x
                this.text_y = y
            },
            insert_image() {
                html2canvas(this.banner_template_dom).then(function(canvas) {
                    document.getElementsByClassName('main')[0].appendChild(canvas);
                });
            },
            insert_text() {
                this.output_text = this.input_text

            },
            uploadFiles() {
                var s = this
                const data = new FormData(document.getElementById('uploadForm'))
                var imagefile = document.getElementById('files')
                console.log(imagefile.files[0])
                data.append('file', imagefile.files[0])
                axios.post('/home', data, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            }

        },
        created() {
            this.bg_template_height = 200;
            this.bg_template_width = 500;
            this.image_width = this.bg_template_width;
            this.image_height = this.bg_template_height;
        },
        updated() {
            this.banner_template_dom = document.getElementById('banner-template');
        }
    }

</script>
