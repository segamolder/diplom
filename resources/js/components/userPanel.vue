<template>
    <div class="userWorkPanel">
        <div class="userWorkPanel__createNew">
            <input type="text" v-model="template_name" placeholder="Имя файла">
            <button class="save blueButton" v-on:click="save">Создать</button>
        </div>
        <div class="userWorkPanel__createNew d-flex" style="height: 30vh; overflow-y: auto; flex-direction: column; justify-content: end;">
            <p>Оставленные заявки:</p>
            <a v-bind:href="'tel:'+phoneNumber.phone" v-for="phoneNumber in phoneNumbers">{{phoneNumber.phone}}</a>
        </div>
        <div class="userWorkPanel__item" v-for="item in canvaFiles"
             v-bind:style="'background-image: url('+item.canvas_image+')'">
            <!--<img v-bind:src="item.canvas_image" alt="">-->
            <button id="show-modal" class="btn btn-primary" @click="showModal = true">Получить ссылку</button>
            <a class="link btn btn-secondary" @click="setIsActive(item.name)" href="/home">Изменить</a>
            <!-- use the modal component, pass in the prop -->
            <modal v-if="showModal" @close="showModal = false">
                <!--
                  you can use custom content here to overwrite
                  default content
                -->
                <h3 slot="header">Название:{{item.name}}</h3>
                <h3 slot="body" style="background-color: #eee;">
                    <code style="color: black">
                        &lt;iframe src="http://oportfolio.ru/widget/{{item.name}}/{{item.user_id}}" frameborder="0"
                        scrolling="no" width={{item.bg_width}} height={{item.bg_height}}&gt;
                        &lt;/iframe&gt;
                    </code>

                </h3>
            </modal>
        </div>


    </div>
</template>

<script>

    import axios from 'axios';
    import modal from '../components/modal';

    export default {
        name: "userPanel",
        components: {
            modal
        },
        data() {
            return {
                canvaFiles: null,
                template_name: '',
                user_id: 0,
                showModal: false,
                phoneNumbers: null
            }
        },
        methods: {
            getPhoneNumber() {
                let self = this;
                axios.get('user/getPhoneNumber').then(result => {
                    this.loading = false;
                    self.phoneNumbers = result.data;
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                });
            },
            getImg() {
                let self = this;
                axios.get('user/getAllImages').then(result => {
                    this.loading = false;
                    self.canvaFiles = result.data;
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                });
            },
            save() {
                let data = {
                    name: this.template_name,
                    canvas_image: '',
                    bg_width: 500,
                    bg_height: 200,
                    image_url: '',
                    image_height: 0,
                    image_width: 0,
                    image_x: 0,
                    image_y: 0,
                    text: '',
                    text_x: 0,
                    text_y: 0,
                    text_width: 0,
                    text_height: 0,
                    text_size: 0,
                    text_font: '',
                    input_text: '',
                    input_x: 0,
                    input_y: 0,
                    input_width: 0,
                    user_id: this.user_id,
                    active: true
                };

                axios.post('/home/saveAll', data)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                location.replace("/home");
            },
            getUserId() {
                axios.get('home/getUserId').then(result => {
                    this.loading = false;
                    this.user_id = result.data;

                    //this.pagination = result.data.pagination;
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                });
            },
            setIsActive(item) {
                axios.post('/home/setTemplateActive', {'name': item})
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created() {
            this.getImg();
            this.getUserId();
            this.getPhoneNumber();
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>

