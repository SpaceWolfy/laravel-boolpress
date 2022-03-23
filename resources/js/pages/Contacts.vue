<template>
    <div class="container">
        <!-- Posso anche non usare un form perché il passaggio dati avviene tramite api -->
        <!-- <form action=""></form> -->
        <h2>Contatti</h2>
        <div v-if="!isSubmitted">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                    >Nome e cognome</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="Nome Cognome"
                    v-model="subData.name"
                />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                    >Indirizzo Email</label
                >
                <input
                    type="email"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="name@example.com"
                    v-model="subData.email"
                />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"
                    >Lasciaci un Messaggio!</label
                >
                <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    v-model="subData.message"
                ></textarea>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"
                        >Upload</span
                    >
                </div>
                <div class="custom-file">
                    <input
                        type="file"
                        class="custom-file-input"
                        id="inputGroupFile01"
                        @change="onAttachmentChange"
                        placeholder="Inserisci l'url di una foto"
                    />
                    <label
                        class="custom-file-label"
                        for="inputGroupFile01"
                    ></label>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary" @click="submit">
                    Invio
                </button>
            </div>
        </div>

        <div v-else>
            <h1>Il form è stato inviato correttamente</h1>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            isSubmitted: false,
            subData: { name: "", email: "", message: "", uploadedFile: null },
        };
    },
    methods: {
        async submit() {
            try {
                const formDataInstance = new FormData();
                formDataInstance.append("name", this.subData.name);
                formDataInstance.append("email", this.subData.email);
                formDataInstance.append("message", this.subData.message);
                formDataInstance.append(
                    "uploadedFile",
                    this.subData.uploadedFile
                );

                const ans = await axios.post("/api/contacts", formDataInstance);
                this.isSubmitted = true;
            } catch (er) {
                alert(
                    "è stato riscontrato un errore, la preghiamo di reinviare il form"
                );
            }
        },

        onAttachmentChange(event) {
            //in questo modo leggo l'evento dei file scelti dall'user attraverso l'input
            //event.target.files;

            this.subData.uploadedFile = event.target.files[0];
        },
    },
};
</script>

<style></style>
