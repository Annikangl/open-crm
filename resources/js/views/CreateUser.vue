<template>
  <div>
    <Navbar @click="isOpen = !isOpen" />
    <Sidenav v-model="isOpen" />

    <section class="main">
      <div class="container">
        <h5 class="title">Страница добавления</h5>
        <div class="row">
          <div class="col s6">
            <a class="btn modal-trigger" ref="modalNewUser" :modal="modalNewUser" href="#modal1" >Добавить пользователя</a>
            <a class="btn modal-trigger" ref="modalDepartment" :modal="modalDepartment" href="#modal2" >Добавить отдел</a>

          </div>
        </div>
      </div>
    </section>

      <!-- Модальное окно с формой newUser -->
      <div id="modal1" class="modal" ref="modal">
        <div class="modal-content">
          <div class="modal-close right-align">
            <i class="material-icons">close</i>
          </div>

          <section class="contact-form">
            <div class="container">
              <div class="col s12 center-align">
                <p class="section__title section__title-form">
                  Добавление пользователя
                </p>
              </div>

              <form class="addUser">
                <div class="row">
                  <div class="input-field col s4">
                    <input type="text" id="firstName" v-model.trim="firstName">
                    <label for="firstName">Фамилия</label>
                  </div>
     
                  <div class="input-field col s4">
                    <input type="text" id="lastName" v-model.trim="lastName">
                    <label for="lastName">Имя</label>
                  </div>
          
                  <div class="input-field col s4">
                    <input type="text" id="middleName" v-model.trim="middleName">
                    <label for="middleName">Отчество</label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s8">
                    <input type="email" id="email" v-model.trim="email">
                    <label for="email">Эл.адрес</label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s6">
                    <input type="password" name="password" id="pass" v-model.trim="password">
                    <label for="pass">Пароль</label>
                  </div>
                  <div class="input-field col s6">
                    <input type="password" name="password-verif" id="pass-verif" v-model.trim="passwordVerif">
                    <label for="pass-verif">Повторите пароль</label>
                  </div>
                </div>

                <div class="row">
                  <button class="btn" type="submit" @click.prevent="addUser">Добавить</button>
                </div>
   
    
              </form>

            </div>
          </section>
        </div>
      </div>

            <!-- Модальное окно с формой newDepartment -->
      <div id="modal2" class="modal" ref="modalDepartment">
        <div class="modal-content">
          <div class="modal-close right-align">
            <i class="material-icons">close</i>
          </div>

          <div class="container">
              <div class="col s12 center-align">
                <p class="section__title section__title-form">
                  Новый отдел
                </p>
              </div>

              <form class="addDepartment">
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" id="depName" v-model="depName">
                    <label for="depName">Введите имя нового отдела</label>
                  </div>
                </div>

                <div class="row">
                  <button class="btn" type="submit" @click.prevent="addDepartment">Добавить</button>
                </div>
              </form>
          </div>

        </div>
      </div>
  
  </div>
</template>

<script>

import M from "materialize-css";
import axios from "axios";
import Navbar from "../components/app/AdminNavbar";
import Sidenav from "../components/app/Sidenav";

export default {
    components: {
        Navbar,
        Sidenav,
  },

  data: () => ({
      isOpen: true,
      modalNewUser: null,
      modalDepartment: null,
      depName: "",

      firstName: "",
      lastName: "",
      middleName: "",
      email: "",
      password: "",
      passwordVerif: "",

  }),

  methods:{
    addUser() {
      axios.post('/api/register', {
        name: this.firstName + ' ' + this.lastName + ' ' + this.middleName,
        email: this.email,
        password: this.password
      },
      {
        headers: {"Content-type": "application/json"}
      })
      .then(res => {
        if (res.data.status) {
          alert('Пользователь добавлен');
        }
      })

      .catch(err => {
        console.log(err.response.data);
      })
    },

    addDepartment() {
      axios.post('/api/podrazdel', {
        nameOtdel: this.depName
      },
      {
        headers: {"Content-type": "application/json"}
      })

      .then(res => {
        if (res.data.status) {
          alert('Отдел успешно добавлен');
        }
      })

      .catch(err => {
        console.log(err.response.data)
      })
    }
  },

  mounted() {
    this.modalNewUser = M.Modal.init(this.$refs.modal, {});
    this.modalDepartment = M.Modal.init(this.$refs.modalDepartment, {});
  }
}
</script>

<style>
@import "/assets/css/index.css";
</style>