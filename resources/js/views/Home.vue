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
                        <small
                          class="helper-text invalid"
                          v-else-if="
                            $v.firstName.$dirty && !$v.firstName.minLength
                          "
                        >
                          От {{ $v.firstName.$params.minLength.min }} до
                          {{ minLength.length }} символов
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
                        <select ref="select">
                          <option value="" disabled selected>
                            Выберите причину обращения
                          </option>
                          <option
                            v-for="issue in issues"
                            :key="issue.issue"
                            value=""
                          >
                            {{ issue.issue }}
                          </option>
                          <!-- <option value="2">Причина 2</option>
                          <option value="3">Причина 3</option> -->
                        </select>
                        <label>Причина обращения</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <select class="group-select" ref="select2">
                          <optgroup label="Орган">
                            <option value="1">Подразделение 1</option>
                            <option value="2">Подразделение 2</option>
                          </optgroup>
                          <optgroup label="Орган 2">
                            <option value="3">Подразделение 3</option>
                            <option value="4">Подразделение 4</option>
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
                            ></textarea>
                            <label for="textarea1">Примечание</label>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="row">
                      <div class="col s12"></div>
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

    select: null,
    value: 1,
    issues: [
      { issue: "Замечание по работе", value: "" },
      { issue: "Некомпетентность сотрудника", value: "" },
      { issue: "Оскорбительное поведение", value: "" },
      { issue: "Превышение полномочий", value: "" },
      { issue: "Просто уебок", value: "" },
    ],
  }),

  validations: {
    firstName: { required, minLength: minLength(6) },
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
      this.$router.push("/");
    },
  },

  mounted() {
    this.modal = M.Modal.init(this.$refs.modal, {});
    this.select = M.FormSelect.init(this.$refs.select, {});
    this.select = M.FormSelect.init(this.$refs.select2, {});
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
