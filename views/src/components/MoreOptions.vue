<template>
    <v-layout>
        <v-navigation-drawer v-model="open" absolute right temporary>
            <v-list>
                <v-list-item>
                    <v-list-item-avatar>
                        <img src="https://wszczecinie.pl/thumb/events/300-00dc8bbb0dca9208c3887a83915112de.jpg" alt="User avatar">
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title>Janusz Maj</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-divider></v-divider>
            <v-form>
                <v-container fluid>
                    <v-flex xs12>
                        <img :src="imageUrl" alt="" height="150px">
                        <v-text-field label="Selec an image" v-model="imageName" prepend-icon="mdi-paperclip" @click="pickFile"></v-text-field>
                        <input type="file" class="d-none" ref="image" accept="image/*" @change="onFilePicked">
                    </v-flex>
                    <v-btn @click="uploadFile" :loading="loading" :disabled="!imageFile">
                        Set as background
                        <v-icon right dark>mdi-upload</v-icon>
                    </v-btn>
                </v-container>
            </v-form>
        </v-navigation-drawer>
    </v-layout>
</template>

<script>
export default {
    name: "MoreOptions",
    data: () => ({
        loading: false,
        open: false,
        imageName: '',
        imageUrl: '',
        imageFile: ''
    }),
    methods: {
        pickFile(){
            this.$refs.image.click()
        },
        onFilePicked(e){
            const files = e.target.files
            if(files[0] !== undefined){
                this.imageName = files[0].name

                if(this.imageName.lastIndexOf(".") <= 0) return

                const fr = new FileReader()
                fr.readAsDataURL(files[0])
                fr.addEventListener("load", () => {
                    this.imageUrl = fr.result
                    this.imageFile = files[0]
                })
            } else {
                this.imageName = ''
                this.imagefile = ''
                this.imageUrl = ''
            }
        },
        uploadFile() {
            console.log(this.imageFile);
        }
    }
}
</script>