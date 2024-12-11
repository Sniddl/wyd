export default () => ({
  displayReactions(authenticated) {
    if (authenticated) {
      this.positionable.toggle();
      setTimeout(() => parseEmojis(".emojis"), 1);
    } else {
      this.$dispatch("modal:open", ["page.auth.login"]);
    }
  },
  async react(postId, reactionId) {
    const result = await axios.post("/a/react", { postId, reactionId });
    this.positionable.close();
    console.log(result);
    this.$refs["reactions"].innerHTML = result.data.reactions.join(" ");
    this.$refs["reactionsCount"].innerHTML = result.data.total;
    parseEmojis();
  },
});
