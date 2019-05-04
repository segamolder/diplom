<template>
    <div class="userWorkPanel">
        <div class="userWorkPanel__createNew">
            <input type="text" v-model="template_name" placeholder="Имя файла">
            <button class="save blueButton" v-on:click="save">Создать</button>
        </div>
        <div class="userWorkPanel__item" v-for="item in canvaFiles" v-bind:style="'background-image: url('+item.canvas_image+')'">
            <!--<img v-bind:src="item.canvas_image" alt="">-->
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "userPanel",
        data() {
            return {
                canvaFiles: null,
                template_name: '',
                user_id: 0,
            }
        },
        methods: {
            getImg() {
                //debugger;
                let self = this;
                axios.get('user/getAllImages').then(result => {

                    this.loading = false;
                    //debugger;
                    self.canvaFiles = result.data;

                    //this.pagination = result.data.pagination;
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                });
            },
            save() {
                // let data = {
                //     bg_width: this.bg_template_width,
                //     bg_height: this.bg_template_height,
                //     image_url: this.image_url,
                //     image_height: this.image_height,
                //     image_width: this.image_width,
                //     image_x: this.image_x,
                //     image_y: this.image_y,
                //     text: this.output_text,
                //     text_x: this.text_x,
                //     text_y: this.text_y,
                //     text_size: this.fontSize,
                //     text_font: this.selectedValue,
                //     input_text: this.userInput,
                //     input_x: this.input_x,
                //     input_y: this.input_y,
                //     user_id: this.userId
                // }
                let data = {
                    name: this.template_name,
                    canvas_image: '',
                    bg_width: 0,
                    bg_height: 0,
                    image_url: '',
                    image_height: 0,
                    image_width: 0,
                    image_x: 0,
                    image_y: 0,
                    text: '',
                    text_x: 0,
                    text_y: 0,
                    text_size: 0,
                    text_font: '',
                    input_text: '',
                    input_x: 0,
                    input_y: 0,
                    user_id: this.userId,
                }

                axios.post('/home/saveAll', data)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
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
        },
        created() {
            this.getImg();
            this.getUserId();
        }
    }
</script>

<style scoped>

</style>