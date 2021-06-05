<template>
  <div>
    <Navbar />
    <Sidenav v-model="isOpen" />

    <section class="main">
      <div class="container center-align">
        <h5 class="title">Статистическая информация</h5>
        <div class="row ">
          <div class="col s6">
              <Linechart :chartdata="lineData" :options="lineOptions" :width="lineProperty.width" />
          </div>
        <div class="col s6">
          <DoughnutChart :id="doughnutProperty.id" :type="doughnutProperty.type" :chartdata="doughnutData" />
        </div>
        </div>
        <div class="row">
        
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Linechart from "../components/charts/LineChart.vue";
import DoughnutChart from '../components/charts/DoughnutChart.vue';
import M from "materialize-css";
import axios from "axios";
import Navbar from "../components/app/AdminNavbar";
import Sidenav from "../components/app/Sidenav";

export default {
  components: {
    Navbar,
    Sidenav,
    Linechart,
    DoughnutChart
  },

  data: () => ({
    isOpen: true,
    lineProperty: {
      width: 900,
    },

    doughnutProperty: {
      id: "doughnut",
      type: "doughnut",
    },

    lineData: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [
        {
          label: "Обращения",
          data: [12, 17, 9, 5, 8, 13, 15, 16, 17],
          backgroundColor: [
            "rgba(255, 99, 132, 0.9)",
            "rgba(54, 162, 235, 0.9)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },

    doughnutData: {
        labels: ['Обработанные', 'Необработанные', 'В обработке', 'Отклонены'],
        datasets: [
          {
            backgroundColor: [
              '#41B883',
              '#E46651',
              '#00D8FF',
              '#DD1B16'
            ],
            data: [40, 20, 80, 10]
          }
        ]
    },

    lineOptions: {
      scales: {
        y: {
          beginAtZero: true,
        },
        x: {
          beginAtZero: true,
        },
      },
    },
  }),



  mounted() {},
};
</script>

<style scoped>
@import "/assets/css/index.css";

.title {
  margin-bottom: 100px;
}
</style>