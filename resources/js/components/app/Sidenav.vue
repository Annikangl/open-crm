<template>
  <ul class="sidenav app-sidenav grey lighten-4" :class="{open: value}">

    <router-link
      v-for="link in links"
      :key="link.url"
      tag="li"
      active-class="active"
      :to="link.url"
      :exact="link.exact"
    >
      <a href="#" class="waves-effect waves-orange pointer">{{link.title}}</a>
    </router-link>
  </ul>
</template>

<script>
export default {
  props: ['value'],
  data: () => ({
    links: [
      {title: 'Главная', url: '/admin', exact: true},
      {title: 'Обращения', url: '/admin/#'},
      {title: 'Добавить пользователя', url: '/admin/#'},
      {title: 'Отделы', url: '/admin/#'},
      {title: 'Категории', url: '/admin/#'}
    ]
  })
}
</script>



