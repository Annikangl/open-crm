<template>
  <div>
    <Navbar @click="isOpen = !isOpen" />
    <Sidenav v-model="isOpen" />

    <section class="main">
      <div class="container">
        <h5 class="title">Список обращений</h5>
        <div class="sortings">
          <button class="btn" @click="getData">Test api</button>
          <!-- <button class="btn" >По дате</button> -->
          <button class="btn" >По статусу</button>
          <!-- <button class="btn" >По территориальному органу</button> -->
        </div>
       
        <div class="row">
          <ul class="collapsible" ref="collapsible">
            <li v-for="reference in references" :key="reference.id">
              <div class="collapsible-header">
                <div class="collapsible-header__inner">
                  <div class="header__inner-left">
                      <i class="material-icons">person</i>{{ reference.prichinaObr }}
                  </div>
                  <div class="header__inner-right">
                            <i class="material-icons">event</i>{{ reference.created_at.substring(0,10) }}
                  </div>
            
                </div>
              </div>
              <div class="collapsible-body">
                <div class="collapsible-body_top">
                  <div class="top_left">
                    ФИО заявителя: <span>{{ reference.FIO }}</span> <br>
                    Статус: <span> {{ reference.status }} </span>
                  </div>
                  <div class="top-right">
                    Дата
                    <span class="date-ref">{{ reference.created_at.substring(0,10) }}</span>
                  </div>
                </div>

                <div class="collapsible-body-content">
                  <div class="content-center">
                    <p class="text-ref">
                      Текст обращения <span> {{ reference.textObr }} </span>
                    </p>
                  </div>
                </div>

                <div class="collapsible-body-footer">
                  <div class="footer-left">
                    <div class="user-email">
                      Эл.адрес &nbsp; <span>{{ reference.email }}</span>
                    </div>
                    <div class="user-phone">
                      Контактный тел.&nbsp;
                      <span> {{ reference.telephone }}</span>
                    </div>
                  </div>
                  <div class="footer-right">
                    <!-- <button class="btn modal-trigger" ref="modalReply" href="#modal1">Добавить пользователя</button> -->
                    <button class="btn modal-trigger" ref="modalReply" href="#modal3" ><i class="material-icons right">reply</i>Ответить</button>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>

                <!-- Модальное окно с формой newDepartment -->
      <div id="modal3" class="modal" ref="modalReply">
        <div class="modal-content">
          <div class="modal-close right-align">
            <i class="material-icons">close</i>
          </div>

          <div class="container">
              <div class="col s12 center-align">
                <p class="section__title section__title-form">
                  Отправка ответа
                </p>
              </div>

              <form class="addDepartment">
                <div class="row">
                  <div class="input-field col s12">
                    <span></span>
                    <input type="text" id="reply-text" v-model="reply">
                    <label for="reply-text">Введите текст ответа</label>
                  </div>
                </div>

                <div class="row">
                  <button class="btn" type="submit" >Ответить</button>
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
    collapsible: null,
    errors: false,
    references: "",
    dropdown2: null,
    userInfo: "",
    reply: "",
    modalReply: null,
  }),

  filters: {
    
  },

  methods: {
    getData() {
      console.log(this.references);
    },

    dropActions() {
      this.drop = M.Dropdown.init(this.$refs.drop, {constrainWidth: false});
    }
  },

  mounted() {
    axios
      .get("/api/references")
      .then((response) => (this.references = response.data))
      .catch((error) => {
        console.log(error);
        this.errors = true;
      });

    this.collapsible = M.Collapsible.init(this.$refs.collapsible, {});
    this.dropdown2 = M.Dropdown.init(this.$refs.dropdown, {
      constrainWidth: false
    })
    this.modalReply = M.Modal.init(this.$refs.modalReply, {});
    this.userInfo = JSON.parse(localStorage.getItem('userInfo'));
  },
};
</script>

<style>
@import "/assets/css/index.css";

.main {
  margin-top: 100px;
}

.collapsible-header__inner {
  width: 100%;
  display: flex;
  justify-content: space-between;
}

.collapsible-body_top,
.collapsible-body-footer {
  display: flex;
  justify-content: space-between;
  color: #000;
  font-size: 12px;
  font-weight: bold;
}

.collapsible-body_top span {
  color: rgb(158, 152, 152);
}

.content-center {
  padding: 5px 0;
  font-weight: bold;
}

.text-ref span {
  font-weight: normal;
}

.footer-left span {
  font-weight: normal;
}

.user-email,
.user-phone {
  font-weight: bold;
  font-size: 12px;
}
</style>