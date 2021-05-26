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
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col s4">
                        <input id="first_name" type="text" class="validate" />
                        <label for="first_name">Фамилия</label>
                      </div>
                      <div class="input-field col s4">
                        <input id="last_name" type="text" class="validate" />
                        <label for="last_name">Имя</label>
                      </div>
                      <div class="input-field col s4">
                        <input id="middle_name" type="text" class="validate" />
                        <label for="middle_name">Отчество</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s8">
                        <input
                          type="email"
                          name="email"
                          id="email"
                          class="validate"
                        />
                        <label for="email">Адрес электронной почты</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s8">
                        <select ref="select">
                          <option value="" disabled selected>
                            Выберите причину обращения
                          </option>
                          <option v-for="issue in issues" :key="issue.issue" value="">
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
                        <div class="col s12"></div>
                    </div>
                    <div class="row">
                        <div class="form-actions">
                            <button type="submit" class="btn" @click.prevent="sendForm">Отправить</button>
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

export default {
  name: "Home",
  components: {
    Navbar,
    Modal,
  },

  data: () => ({
    modal: null,
    select: null,
    value: 1,
    issues: [
        {issue: "Замечание по работе", value: ''},
        {issue: "Некомпетентность сотрудника" , value: ''},
        {issue: "Оскорбительное поведение", value: ''},
        {issue: "Превышение полномочий", value: ''},
        {issue: "Просто уебок", value: ''},
    ]
  }),

  methods: {
      sendForm() {
          console.log('Sending...');
      }
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
