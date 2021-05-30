import axios from 'axios';
import { isPlainObject } from 'jquery';

export default {
    actions: {
        async sendReference({dispatche, commit}, {fio,telephone,prichinaObr,textObr,idPodr}) {
            let postBody = {fio, telephone,prichinaObr, textObr, idPodr};
            try {
                axios.post('/api/references', {
                    body: postBody
                })
                .then(response => {
                    console.log("Response: " + JSON.parse(response));
                })
                .catch(e => {
                    console.log(e);
                })
            } catch(e) {
                throw e
            }
        }
    }
}