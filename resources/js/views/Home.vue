<template>
  <div class="app">
    <Navbar />
    <Modal />
    <div class="app-content">
      <section class="content">
        <div class="container">
          <div class="row">
            <div class="col s12 center-align">
              <h4>В форме ниже оставьте своео обращение</h4>
            </div>
            <div class="col s4 valign-wrapper">
              <p>
                Перейдите на форму, котораян аходиться ниже. Внимательно
                ознакомьтесь с пунктами формы и заполните каждую графу После
                успешного заполнения формы, отправьте ее. <br />
                Форма будет на рассмотрении
              </p>
            </div>
            <div class="col s8">
              <img
                src="https://i.pinimg.com/originals/76/aa/e0/76aae01457877a4b5355e6528daaa520.png"
                alt=""
              />
            </div>
          </div>

          <div class="row">
            <div class="secttion__footer center-align">
              <button data-target="modal1" class="btn-large modal-trigger">
                Отправить заявку
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- Модальное окно с формой -->
      <div id="modal1" class="modal" ref="modal">
        <div class="modal-content">
          <div class="modal-close right-align">
            <i class="material-icons">close</i>
          </div>

          <section class="contact-form">
            <div class="container">
              <div class="col s12 center-align">
                <p class="section__title section__title-form">
                  Заполните форму для отправки обращения
                </p>
              </div>

              <div class="contact-form__inner">
                <div class="row">
                  <form class="col s12" @submit.prevent="submitForm">
                    <div class="row">
                      <div class="input-field col s4">
                        <input
                          id="first_name"
                          type="text"
                          v-model.trim="firstName"
                          :class="{
                            invalid:
                              ($v.firstName.$dirty && !$v.firstName.required) ||
                              ($v.firstName.$dirty && !$v.firstName.minLength),
                          }"
                        />
                        <label for="first_name">Фамилия</label>
                        <small
                          class="helper-text invalid"
                          v-if="$v.firstName.$dirty && !$v.firstName.required"
                        >
                          Заполните поле
                        </small>

                      </div>
                      <div class="input-field col s4">
                        <input
                          id="last_name"
                          type="text"
                          v-model.trim="lastName"
                          :class="{
                            invalid:
                              ($v.lastName.$dirty && !$v.lastName.required) ||
                              ($v.lastName.$dirty && !$v.lastName.minLength),
                          }"
                        />
                        <label for="last_name">Имя</label>
                        <small
                          class="helper-text invalid"
                          v-if="$v.lastName.$dirty && !$v.lastName.required"
                        >
                          Заполните поле
                        </small>
                      </div>
                      <div class="input-field col s4">
                        <input id="middle_name" type="text" 
                        v-model.trim="middleName"
                        :class="{
                            invalid:
                              ($v.middleName.$dirty && !$v.middleName.required) ||
                              ($v.middleName.$dirty && !$v.middleName.minLength),
                          }"
                        />
                        <label for="middle_name">Отчество</label>
                        <small
                          class="helper-text invalid"
                          v-if="$v.middleName.$dirty && !$v.middleName.required"
                        >
                          Заполните поле
                        </small>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s8">
                        <input
                          type="email"
                          name="email"
                          id="email"
                          v-model.trim="email"
                          :class="{
                            invalid:
                              ($v.email.$dirty && !$v.email.required) ||
                              ($v.email.$dirty && !$v.email.email),
                          }"
                        />
                        <label for="email">Адрес электронной почты</label>
                        <small
                          class="helper-text invalid"
                          v-if="$v.email.$dirty && !$v.email.required"
                        >
                          Поле не должно быть пустым
                        </small>
                        <small
                          class="helper-text invalid"
                          v-else-if="$v.email.$dirty && !$v.email.email"
                        >
                          Некорректный адрес эл почты
                        </small>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s8">
                        <select ref="select" v-model="issue_select">
                          <option value="" disabled selected>
                            Выберите причину обращения
                          </option>
                          <option
                            v-for="issue in issues"
                            :key="issue.issue"
                            :value="issue.issue"
                          >
                            {{ issue.issue }}
                          </option>
  
                        </select>
                        <label>Причина обращения</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <select class="group-select" ref="select2" v-model="depart_select">
                          <optgroup v-for="(department,index) in departments" :key="index" :label="department.NameOtdel">
                            <option  :value="department.NamePodrazdel">{{ department.NamePodrazdel }} </option>
                          </optgroup>
                        </select>
                        <label>Структурное подразделение</label>
                      </div>
                    </div>

                    <div class="row">
                      <form class="col s12">
                        <div class="row">
                          <div class="input-field col s12">
                            <textarea
                              id="textarea1"
                              class="materialize-textarea"
                              v-model="note"
                            ></textarea>
                            <label for="textarea1">Примечание</label>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="row">
                      <div class="col s12">
       
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-actions">
                        <button type="submit" class="btn">Отправить</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from 'axios';
import M from "materialize-css";
import Navbar from "../components/app/Navbar";
import Modal from "../components/app/Modal";
import { email, required, minLength } from "vuelidate/lib/validators";

export default {
  name: "Home",
  components: {
    Navbar,
    Modal,
  },

  data: () => ({
    modal: null,
    firstName: "",
    lastName: "",
    middleName: "",
    email: "",
    issue_select: "",
    depart_select: "",
    note: "",

    select: null,
    value: 1,
    issues: [
      { issue: "Замечание по работе", value: "" },
      { issue: "Некомпетентность сотрудника", value: "" },
      { issue: "Оскорбительное поведение", value: "" },
      { issue: "Превышение полномочий", value: "" },
      { issue: "Просто уебок", value: "" },
    ],
    departments: null,
  }),

  validations: {
    firstName: { required, minLength: minLength(2) },
    lastName: { required, minLength: minLength(6) },
    middleName: { required, minLength: minLength(6) },
    email: { email, required },
  },

  methods: {
    submitForm() {
      if (this.$v.$invalid) {
        this.$v.$touch();
        return;
      }

      const formData = {
        userId: Math.floor(Math.random() * 10),
        fullName: this.firstName + ' ' + this.lastName + ' ' + this.middleName,
        email: this.email,
        issue: this.issue_select,
        department: this.depart_select,
        note: this.note,
      }

      // console.log(this.departments);

      // for (let i = 0; i < this.departments.length; i++) {
      //   for (let item in this.departments[i]) {
      //     console.log(item)
      //   }
      // }

      

      // for (let i = 0; i < this.departments.length; i++) {
      //   console.log(this.departments[i]['NamePodrazdel']);

      //   // for (let q = 0; q < this.departments[i]; q++) {
      //   //   console.log(this.departments[i][q]);
      //   // }
      // }
      
      
    },
  },

  mounted() {
    axios
      .get('http://127.0.0.1:8000/api/podrazdel')
      .then(response => (this.departments = response.data.podrazdels))

    this.modal = M.Modal.init(this.$refs.modal, {});
    this.select = M.FormSelect.init(this.$refs.select, {});
    this.select = M.FormSelect.init(this.$refs.select2, {});
    this.$error('хохла спросить забыли');

    
  },
};
</script>

<style scoped>
.content {
  height: 100vh;
}

.section__title-form {
  font-weight: bold;
  margin-bottom: 30px;
}

.secttion__footer {
  margin-top: 100px;
}
</style>
