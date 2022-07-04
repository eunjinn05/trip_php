function trip_create () {
  $(document).on("change", "#file", function (e) {
    uploadFile(e);
  });
}