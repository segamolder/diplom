<template>
    <div id="grid">
        <div class="header">
            <!---->
            <div class="userBlock">
                <span class="userBlock__title">Изображение по ссылке</span>
                <input class="userBlock__input" type="text" v-model="userUrlImage" placeholder="URL изображения">
                <button class="userBlock__button blueButton" v-on:click="insertUserUrlImage">Добавить</button>
            </div>

            <!--<button v-on:click='insert_image'>Изображение фона</button>-->
            <div class="userBlock">
                <span class="userBlock__title">Изменение размера</span>
                <input class="userBlock__input" type="text" v-model="bgTemplateHeightLayer"
                       v-bind:placeholder="image_height">
                <input class="userBlock__input" type="text" v-model="bgTemplateWidthLayer"
                       v-bind:placeholder="image_width">
                <button class="blueButton" v-on:click="insertBackgroundSize">Изменить размер</button>
            </div>
            <div class="userBlock">
                <span class="userBlock__title">Добавление текста</span>
                <input class="userBlock__input" type="text" v-model="input_text" placeholder="Введите текст">
                <select v-model="selectedValue">
                    <option disabled value="">Please select one</option>
                    <option v-for="item in fonts" :value="item">{{item}}</option>
                </select>
                <button class="blueButton" v-on:click='insert_text'>Добавить текст</button>
            </div>
            <div class="userBlock">
                <span class="userBlock__title">Передать INPUT</span>
                <input class="userBlock__input" type="text" v-model="userInputLayer" placeholder="Текст Input'а">
                <button class="blueButton" v-on:click='insert_input'>Добавить текст</button>
            </div>
        </div>
        <div class="nav js">
            <!--Навигационная панель слева-->
            <!--<form id="uploadForm" name="uploadForm" enctype="multipart/form-data">-->
            <!--<input type="file" id="files" name="files" multiple>-->
            <!--<input type=button value="Загрузить" @click="this.uploadFiles">-->
            <!--</form>-->
            <form id="uploadForm" action="#" enctype="multipart/form-data">
                <div class="input-file-container">
                    <input class="input-file" id="my-file" type="file" @change="this.putImageName">
                    <label tabindex="0" for="my-file" class="input-file-trigger">Выберите файл...</label>
                </div>
                <p class="file-return"></p>
                <input class="uploadFileButton blueButton" type=button value="Загрузить" @click="this.uploadFiles">
            </form>
            <!--Картинки с сервера-->
            <div class="outputImages">
                <div class="outputImage" v-for="image in files"
                     v-bind:style="'backgroundImage: url(/storage/'+user+'/image/'+ image.name + '.'+image.extension"
                     @click="setImage('/storage/'+user+'/image/'+ image.name + '.'+image.extension)"></div>
            </div>
            <!--<input type="text" v-model="template_name" placeholder="Имя файла">-->
            <!--<button class="save blueButton" v-on:click="save">Создать</button>-->
            <button class="blueButton" v-on:click="updateAll">Сохранить</button>
        </div>
        <div class="main">
            <div id="banner-template" v-bind:style="'background-color: #ffffff; display: block; position: relative; width:' + bg_template_width + 'px; height:' + bg_template_height + 'px; background-repeat: no-repeat'
                                                        ">
                <vue-draggable-resizable v-bind:style="'display:' + userImageVisible" class-name="backgroungImage"
                                         :w=bg_template_width :h=bg_template_height
                                         parent=".main" @dragging="onDrag_image" @resizing="onResize_image"
                                         :x = image_x
                                         :y = image_y>
                    <img v-bind:src="image_url" alt=""
                         v-bind:style="{position: 'relative', width: image_width + 'px', height: image_height + 'px'}">
                </vue-draggable-resizable>

                <vue-draggable-resizable v-bind:style="'display:' + userTextVisible +'; font-size:'+fontSize +'px'"
                                         class-name="backgroungText" :w=text_width
                                         parent=".main" @dragging="onDrag_text"
                                         @resizing="onResize_text"
                                         :h=fontSize*2
                                         :x = text_x
                                         :y = text_y>
                    <p id="textFont" v-bind:style="'font-family:' + selectedValue ">{{output_text}}</p>
                </vue-draggable-resizable>

                <vue-draggable-resizable v-bind:style="'display:'+ userInputVisible" class-name="backgroundInput"
                                         :w=input_width
                                         :h=input_height
                                         parent=".main"
                                         @dragging="onDrag_input"
                                         @resizing="onResize_input"
                                         :x = input_x
                                         :y = input_y>
                    <div class="inputItems">
                        <input type="text" placeholder="">
                        <button>{{ userInput }}</button>
                    </div>
                </vue-draggable-resizable>
            </div>

            <!--<button @click="insert_image">test</button>-->
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
                userImageVisible: 'none',
                text_width: 0,
                text_height: 0,
                text_x: 0,
                text_y: 0,
                userTextVisible: 'none',
                input_text: '',
                output_text: '',
                banner_template_dom: '',
                files: null,
                user: null,
                userUrlImage: '',
                bgTemplateHeightLayer: '',
                bgTemplateWidthLayer: '',
                selectedValue: "'Raleway', sans-serif",
                fonts: ["'ZCOOL KuaiLe', cursive", "'Gugi', cursive", "'Just Another Hand', cursive", "'Sofia', cursive", "'Raleway', sans-serif"],
                userInput: '',
                input_x: 0,
                input_y: 0,
                input_width: 0,
                input_height: 0,
                userInputLayer: '',
                userInputVisible: 'none',
                fontSize: 40,
                userId: null,
                template_name: '',
                canvasImage: null,
                templateInfo: null,
                timerId: null
            }
        },
        methods: {
            putImageName() {

                //document.querySelector(".input-file" ).addEventListener( "change", function( event ) {
                document.querySelector(".file-return").innerHTML = document.querySelector(".input-file").value;
                //});
            },
            onResize_image: function (x, y, width, height) {
                this.image_x = x
                this.image_y = y
                this.image_width = width
                this.image_height = height
            },
            onDrag_image: function (x, y) {
                this.image_x = x
                this.image_y = y
            },
            onResize_text: function (x, y, width, height) {
                this.text_x = x;
                this.text_y = y;
                this.text_width = width;
                this.text_height = height;
                document.getElementById('textFont').style.fontSize = this.text_height / 2 + 'px';
                this.fontSize = this.text_height / 2;
            },
            onDrag_text: function (x, y) {
                this.text_x = x
                this.text_y = y
            },
            onDrag_input: function (x, y) {
                this.input_x = x
                this.input_y = y
            },
            onResize_input: function (x, y, width, height) {
                this.input_x = x
                this.input_y = y
                this.input_width = width
                this.input_height = height
            },
            insert_image() {
                let self = this;
                html2canvas(this.banner_template_dom).then(function (canvas) {
                    self.canvasImage = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                });
            },
            insert_text() {
                this.output_text = this.input_text;
                this.userTextVisible = 'block'

            },
            uploadFiles() {

                const data = new FormData(document.getElementById('uploadForm'))
                var imagefile = document.getElementById('my-file')
                console.log(imagefile.files[0])

                data.append('file', imagefile.files[0])
                data.append('name', imagefile.files[0].name)
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
                    });
                this.getImg();
            },
            getImg() {
                axios.get('home/' + this.user).then(result => {

                    this.loading = false;
                    this.files = result.data;

                    //this.pagination = result.data.pagination;
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                });
            },
            getUserDir() {
                axios.get('home/getUserDir').then(result => {

                    this.loading = false;
                    this.user = result.data;

                    //this.pagination = result.data.pagination;
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                });
            },
            getUserId() {
                axios.get('home/getUserId').then(result => {
                    this.loading = false;
                    this.userId = result.data;

                    //this.pagination = result.data.pagination;
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                });
            },
            setImage(url) {
                this.image_url = url;
                this.userImageVisible = 'block'
            },
            insertUserUrlImage() {
                this.image_url = this.userUrlImage;
                this.userImageVisible = 'block'
            },
            insertBackgroundSize() {
                this.bg_template_height = this.bgTemplateHeightLayer;
                this.bg_template_width = this.bgTemplateWidthLayer;

            },
            insert_input() {
                this.userInput = this.userInputLayer;
                this.userInputVisible = 'block';
            },
            // save() {
            //     // let data = {
            //     //     bg_width: this.bg_template_width,
            //     //     bg_height: this.bg_template_height,
            //     //     image_url: this.image_url,
            //     //     image_height: this.image_height,
            //     //     image_width: this.image_width,
            //     //     image_x: this.image_x,
            //     //     image_y: this.image_y,
            //     //     text: this.output_text,
            //     //     text_x: this.text_x,
            //     //     text_y: this.text_y,
            //     //     text_size: this.fontSize,
            //     //     text_font: this.selectedValue,
            //     //     input_text: this.userInput,
            //     //     input_x: this.input_x,
            //     //     input_y: this.input_y,
            //     //     user_id: this.userId
            //     // }
            //     let data = {
            //         name: this.template_name,
            //         canvas_image: '',
            //         bg_width: 0,
            //         bg_height: 0,
            //         image_url: '',
            //         image_height: 0,
            //         image_width: 0,
            //         image_x: 0,
            //         image_y: 0,
            //         text: '',
            //         text_x: 0,
            //         text_y: 0,
            //         text_size: 0,
            //         text_font: '',
            //         input_text: '',
            //         input_x: 0,
            //         input_y: 0,
            //         user_id: this.userId,
            //     }
            //
            //     axios.post('/home/saveAll', data)
            //         .then(function (response) {
            //             console.log(response);
            //         })
            //         .catch(function (error) {
            //             console.log(error);
            //         });
            // },
            updateAll() {
                this.insert_image();
                let data = {
                    name: this.template_name,
                    canvas_image: this.canvasImage,
                    bg_width: this.bg_template_width,
                    bg_height: this.bg_template_height,
                    image_url: this.image_url,
                    image_height: this.image_height,
                    image_width: this.image_width,
                    image_x: this.image_x,
                    image_y: this.image_y,
                    text: this.output_text,
                    text_x: this.text_x,
                    text_y: this.text_y,
                    text_width: this.text_width,
                    text_height: this.text_height,
                    text_size: this.fontSize,
                    text_font: this.selectedValue,
                    input_text: this.userInput,
                    input_x: this.input_x,
                    input_y: this.input_y,
                    input_width: this.input_width,
                    user_id: this.userId,
                    active: true

                }

                axios.post('/home/updateAll', data)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getTemplateInfo() {
                axios.get('home/getTemplateInfo').then(result => {

                    this.loading = false;
                    this.templateInfo = result.data[0];
                    this.template_name = this.templateInfo.name;
                    this.bg_template_width = this.templateInfo.bg_width;
                    this.bg_template_height = this.templateInfo.bg_height;
                    this.image_url = this.templateInfo.image_url;
                    if (this.templateInfo.image_url != "") { this.userImageVisible = 'block' }
                    if (this.templateInfo.image_height != 0 && this.templateInfo.image_width !=0) {
                        this.image_height = this.templateInfo.image_height;
                        this.image_width = this.templateInfo.image_width;
                    }
                    this.image_x = this.templateInfo.image_x;
                    this.image_y = this.templateInfo.image_y;
                    this.output_text = this.templateInfo.text;
                    if (this.templateInfo.text != "") { this.userTextVisible = 'block' }
                    this.text_x = this.templateInfo.text_x;
                    this.text_y = this.templateInfo.text_y;
                   // this.onDrag_text(this.templateInfo.text_x, this.templateInfo.text_y);
                    if (this.templateInfo.text_size != 0) {
                        this.fontSize = this.templateInfo.text_size;
                    }
                    if (this.templateInfo.text_height != 0 && this.templateInfo.text_width != 0) {
                        this.text_height = this.templateInfo.text_height;
                        this.text_width = this.templateInfo.text_width;
                    }
                    this.selectedValue = this.templateInfo.text_font;
                    this.userInput = this.templateInfo.input_text;
                    if (this.templateInfo.input_text != "") { this.userInputVisible = 'block' }
                    if (this.templateInfo.input_height != 0 && this.templateInfo.input_width != 0) {
                        this.input_width = this.templateInfo.input_width;
                        this.input_height = this.templateInfo.input_height;
                    }
                    this.input_x = this.templateInfo.input_x;
                    this.input_y = this.templateInfo.input_y;
                    //this.userId = this.templateInfo.user_id;
                    //active: false
                    //
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                });

            },

        },
        mounted() {
            //Если вызвать в created то будут падать ошибки в консоль так как user  будет null
            this.getImg();
        },
        created() {
            this.bg_template_height = 200;
            this.bg_template_width = 500;
            this.image_width = this.bg_template_width;
            this.image_height = this.bg_template_height;
            this.getUserId();
            this.getUserDir();
            this.getTemplateInfo();
            let self = this;
            this.timerId = setInterval(function() {
                self.updateAll();
                //self.getImg();
            }, 10000);
        },
        updated() {
            this.banner_template_dom = document.getElementById('banner-template');
            //this.getImg();

        },
        beforeDestroy() {
            clearInterval(this.timerId);
        }
    }

</script>
