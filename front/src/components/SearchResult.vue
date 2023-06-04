<template>
  <div class="box">
    <img :src="poster" width="100" height="100" />
    <div class="des">
      <h3>{{ title }}</h3>
      <div>Year: {{ year }}</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SearchResult",
  props: ['title', 'year', 'poster'],
}
</script>

<style scoped>
.box {
  border: 1px solid rgb(212, 211, 211);
  padding: 20px;
  margin: 10px;
  font-size: 18px;
  color: rgb(53, 52, 52);
  display: flex;
  flex-direction: row;
}

.des {
  text-align: left;
}

img {
  padding-right: 10px;;
}
</style>