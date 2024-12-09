export default () => ({
  asideOpen: false,
  toggleSidebar() {
    this.asideOpen = !this.asideOpen;
  },
  navigate(href) {
    if (window.getSelection().toString().length === 0) {
      Livewire.navigate(href);
    }
  },
});
