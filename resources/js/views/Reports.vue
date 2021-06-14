<template>
  <div>
    <Navbar @click="isOpen = !isOpen" />
    <Sidenav v-model="isOpen" />

    <section class="main">
      <div class="container">
        <h5 class="export-title">Экспорт отчета в Excel</h5>
        <div class="row">
            <div class="col s8 center-align">
                <img src="/assets/img/excel-ui.jpg" alt="excel" width="100%">
            </div>
            <div class="col s4 center-align">
                <p>Нажми кнопку "Экспорт", чтобы начать загрузку отчета</p>
                <button class="btn">Экспорт</button>
            </div>
        </div>
      </div>
    </section>
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
  }),
}
</script>

<style>
@import "/assets/css/index.css";

.export-title {
    margin-bottom: 100px;
}
</style>