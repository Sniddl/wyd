export default (channels = []) => ({
  channels: channels,
  init() {
    console.log("create-channels", this.channels);
  },
  createChannel() {
    this.channels.push({
      name: "",
      order: this.channels.length,
      threads: [],
    });
  },
  createThread(index) {
    this.channels[index].threads.push({
      name: "",
      order: this.channels[index].threads.length,
    });
  },
  deleteItem(index, list) {
    list.splice(index, 1);
  },
  moveUp(index, list) {
    const item = list.splice(index, 1)[0];
    list.splice(Math.max(0, index - 1), 0, item);
    list.forEach((item, index) => (item.order = index));
  },
  moveDown(index, list) {
    const length = list.length;
    const item = list.splice(index, 1)[0];
    list.splice(Math.min(length - 1, index + 1), 0, item);
    list.forEach((item, index) => (item.order = index));
  },
  getChannels() {
    return this.channels.sort((a, b) => a.order - b.order);
  },
  getThreads(channel) {
    return channel.threads?.sort((a, b) => a.order - b.order) ?? [];
  },
});
