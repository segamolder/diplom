<template>
    <div id="grid">
        <div class="header">
            <input type="text" v-model="image_url" placeholder="URL изображения">
            <button v-on:click='insert_image'>Изображение фона</button>
            <input type="text" v-model="bg_image_height" placeholder="height: %">
            <input type="text" v-model="bg_image_width" placeholder="width: %">
            <button v-on:click='update_template'>Изображение фона</button>
        </div>
        <div class="nav">

        </div>
        <div class="main">
            <div class="banner-template" v-bind:style=" { 
                                                            border: '1px solid black', 
                                                            display: 'block',
                                                            height: bg_image_height + '%',
                                                            width: bg_image_width + '%'
                                                        }">  
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'banner_editor',
        data() {
            return {
                image_url: '',
                bg_image_height: '',
                bg_image_width: '',
            }
        },
        methods: {
            insert_image() {
                
            },
            update_template() {
                
            }
        },
        created() {
          
        }
    }
</script>
