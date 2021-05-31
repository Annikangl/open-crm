import axios from "axios";
import { isPlainObject } from "jquery";

export default {
    actions: {
        async sendReference(
            { dispatche, commit },
            { FIO, email, telephone, prichinaObr, textObr, idPodr }
        ) {
            let postBody = {
                FIO,
                email,
                telephone,
                prichinaObr,
                textObr,
                idPodr
            };
            try {
                await axios
                    .post("/api/references", {
                        body: postBody
                    })
                    .then(response => {
                        console.log(postBody);
                    })
                    .catch(e => {
                        console.log(e);
                    });
            } catch (e) {
                throw e;
            }
        },

        async login({ dispatche, commit }, { email, password }) {
            axios
                .post(
                    "api/login",
                    { email: this.email, password: this.password },
                    {
                        headers: {
                            "Content-type": "application/json"
                        }
                    }
                )
                .then(res => {
                    if (res.data.status) {
                        this.$router.push("/admin");
                    }
                })

                .catch(err => {
                    console.log(err.response.data);
                });
        }
    }
};
