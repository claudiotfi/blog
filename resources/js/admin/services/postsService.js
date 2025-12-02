import axios from "@/admin/axios";

export default {
  async getAll(url = null, filters = {}) {
    const endpoint = url || "/api/admin/posts";

    const response = await axios.get(endpoint, {
      params: filters
    });

    return response.data;
  },

  async getCategories() {
    const response = await axios.get("/api/admin/categories");
    return response.data;
  }
};
