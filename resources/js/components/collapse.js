export default (data = {}) => ({
  collapseOpen: !!data.collapseOpen,
  init() {
    console.log(data);
  },
  toggleCollapse() {
    this.collapseOpen = !this.collapseOpen;
  },
});
