<script>
import { Doughnut } from "vue-chartjs";

export default {
  extends: Doughnut,
  props: {
    type: {
      type: String,
      required: true,
    },
    chartdata: {
      type: Object,
      default: null,
    },
    options: {
      type: Object,
      default: null,
    },
    plugins: {
      type: Array,
      default() {
        return [];
      },
    },
  },
  mounted() {
    this.renderChart(this.chartdata, this.type, this.options, this.plugins);
  },
};
</script>