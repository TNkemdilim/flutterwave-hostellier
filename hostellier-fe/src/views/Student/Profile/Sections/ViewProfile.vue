<template>
  <div class="container ui">
    <div>
      <p>
        <strong>Name:</strong> {{ user.firstname}}  {{user.lastname}}<br><br>
        <strong>E-mail:</strong> {{ user.email}}<br><br>
        <strong>Level:</strong> {{ user.level * 100}}<br>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "ViewStudentProfile",
  computed: {
    user() {
      return this.$store.getters.user;
    }
  }
};
</script>
