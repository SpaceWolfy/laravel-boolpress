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
            subData: { name: "", email: "", message: "" },
        };
    },
    methods: {
        async submit() {
            try {
                const ans = await axios.post("/api/contacts", this.subData);
                this.isSubmitted = true;
            } catch (er) {
                alert(
                    "è stato riscontrato un errore, la preghiamo di reinviare il form"
                );
            }
        },
    },
};
</script>

<style></style>
