<template>
    <button @click="onClick()" class="btn-button">
        <div class="btn-content">
            <span v-if="title" class="btn-label">{{ title }}</span>
            <img v-if="image" class="btn-image" alt="" :src="image">
            <i v-if="icons" :class="icons"/>
        </div>
    </button>
</template>

<script>
  export default {
      name: "Button",
      props: {
          image: {
              type: String
          },
          icons: {
              type: String
          },
          title: {
              type: String
          }
      },
      methods: {
          onClick(e) {
              this.$emit("handelClick")
          }
      }
  }
</script>

<style lang="scss">
  .btn-button {
    background: black;
    border-radius: 8px;

    min-height: auto;
    height: 42px;
      border: 1px solid #ffffff38;
    padding: 0 5px;
      box-shadow: 0 0 6px 1px rgb(255 255 255 / 43%);
      transition: 0.2s ease;
    width: 150px;
      &:hover{
          box-shadow: 0 0 7px 1px rgb(255 255 255 / 50%);
          transform: scale(1.02);
      }
  }
  .btn-content{
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
  }
  .btn-label{
      font-size: 12px;
      color: #ffffff;
  }
  .btn-image{
        max-width: 24px;
        height: auto;
  }
  .icons{
      color: #ffffff;
  }
</style>
