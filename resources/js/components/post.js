export default () => ({
  displayReactions() {},
  async react(postId, reactionId) {
    const result = await axios.post("/a/react", { postId, reactionId });
    this.positionable.close();
    console.log(result);
    this.$refs["reactions"].innerHTML =
      result.data.reactions.join(" ").trim() || "❤️";
    this.$refs["reactionsCount"].innerHTML = result.data.total;
    parseEmojis();
  },
});
