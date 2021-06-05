<template>
  <div class="app">
    <Navbar />

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
              <button data-target="modal1" class="btn-large blue darken-1 modal-trigger">
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
                        <input
                          id="middle_name"
                          type="text"
                          v-model.trim="middleName"
                          :class="{
                            invalid:
                              ($v.middleName.$dirty &&
                                !$v.middleName.required) ||
                              ($v.middleName.$dirty &&
                                !$v.middleName.minLength),
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
                      <div class="input-field col s6">
                          <input type="text" name="telephone" id="telephone" v-model="telephone">
                        <label for="telephone">Номер телефона</label>
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
                      
                        
                        <select
                          ref="select2"
                          v-model="select2"
                        >
                          <optgroup
                            v-for="department in deps"
                            :key="department.id"
                            :label="department.nameOtdel"
                          >
                          
                            <option
                              v-for="{
                                NamePodrazdel,
                                id,
                              } in department.NamePodrazdel"
                              :key="id"
                              :value="department.id"
                            >
                              {{ NamePodrazdel }}
                            </option>
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
                      <div class="form-actions">
                        <button type="submit" class="btn blue darken-1" @click.prevent="sendReferense">Отправить</button>
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
import axios from "axios";
import store from '../store';
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
    telephone: "",
    issue_select: "",
    depart_select: "",
    note: "",

    select: null,
    select2: '',
    value: 1,
    issues: [
      { issue: "Замечание по работе", value: "" },
      { issue: "Некомпетентность сотрудника", value: "" },
      { issue: "Оскорбительное поведение", value: "" },
      { issue: "Превышение полномочий", value: "" },
      { issue: "Просто уебок", value: "" },
    ],
    // departments: null,
    deps: [
      {id: 1, nameOtdel: "По умолчанию", NamePodrazdel: [
        {id: 0, NamePodrazdel: "На усмотрение персонала"}
      ] },
      {id: 2, nameOtdel: "Центральный аппарат Министерства юстиции", NamePodrazdel: [
        {id: 1, NamePodrazdel: "Отдел приема документов"},
        {id: 2, NamePodrazdel: "Отдел обработки документов"},
        {id: 3, NamePodrazdel: "Отдел сбора информации"},
        // {id: 4, NamePodrazdel: "Отдел записи актов гражданского состояния"},
        // {id: 5, NamePodrazdel: "Отдел государственной регистрации вещных прав"},
        // {id: 6, NamePodrazdel: "Отдел государственной исполнительной службы"},
        // {id: 7, NamePodrazdel: "Отдел технической инвентаризации, учета и оценки н"},
      ]},
      {id: 3, nameOtdel: "Территориальные ограны", NamePodrazdel: [
        {id: 8, NamePodrazdel: "Донецкий городской отдел ЗАГС"},
        {id: 9, NamePodrazdel: "Макеевский городской отдел ЗАГС"},
        // {id: 10, NamePodrazdel: "Енакиевский городской отдел ЗАГС"},
        // {id: 11, NamePodrazdel: "Горловский городской отдел ЗАГС"},
        // {id: 12, NamePodrazdel: "Харцызский городской отдел ЗАГС"},
      ]},
      {id: 4, nameOtdel: "Государственный нотариальный архив", NamePodrazdel: [
        {id: 13, NamePodrazdel: "Государственная нотариальная контора города Донецк"},
        {id: 14, NamePodrazdel: "Государственная нотариальная контора города Харцызск"},
        // {id: 15, NamePodrazdel: "осударственная нотариальная контора города Снежное"},
        // {id: 16, NamePodrazdel: "Государственная нотариальная контора города Макеевка"},
        // {id: 17, NamePodrazdel: "Государственная нотариальная контора пгт Старобешево"},
        // {id: 18, NamePodrazdel: "Государственная нотариальная контора города Ясиноватая"},
        // {id: 19, NamePodrazdel: "Государственная нотариальная контора города Новоазовск"},
      ]},
    ]
  }),

  validations: {
    firstName: { required, minLength: minLength(2) },
    lastName: { required, minLength: minLength(6) },
    middleName: { required, minLength: minLength(6) },
    email: { email, required },
  },

  methods: {
    sendReferense() {
      if (this.$v.$invalid) {
        this.$v.$touch();
        return;
      }

      axios.post('api/references',{
          FIO: this.firstName + ' ' + this.lastName + ' ' + this.middleName,
          email:this.email,
          telephone: this.telephone,
          prichinaObr: this.issue_select,
          textObr: this.note,
          idPodr: this.select2
        }, 
        { headers: {
          "Content-type": "application/json"
        }
      })
      .then(res => {
        if (res.data.status) {
           let instance = M.Modal.getInstance(this.$refs.modal);
           instance.close();
           this.$message('Обращение успешно отправлено!');
        }
      })

      .catch(err => {
        console.log(err.response.data);
        this.error = true;
      })
    }
    // async submitForm() {
    //   if (this.$v.$invalid) {
    //     this.$v.$touch();
    //     return;
    //   }

    //   const formData = {
    //     // userId: Math.floor(Math.random() * 10),
    //     FIO: this.firstName + " " + this.lastName + " " + this.middleName,
    //     email: this.email,
    //     telephone: this.telephone,
    //     prichinaObr: this.issue_select,
    //     idPodr: this.select2,
    //     textObr: this.note,
    //   };

    //   try {
    //       await this.$store.dispatch('sendReference', formData)
    //       // this.$router.push('/admin')
    //   } catch(e) {
    //     console.log(e);
    //   }
      
    // },
  },

  mounted() {
    // axios
    //   .get("http://127.0.0.1:8000/api/podrazdel")
    //   .then((response) => (this.departments = response.data.podrazdels));

    this.modal = M.Modal.init(this.$refs.modal, {});
    this.select = M.FormSelect.init(this.$refs.select, {});
    this.select2 = M.FormSelect.init(this.$refs.select2, {});

    this.$error("TODO: Отформатировать дату на бекенде, сделать сортировки на фронте");
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
