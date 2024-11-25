import apiClient from './apiClient';

export const getTasks = async () => {
  const response = await apiClient.get('/tasks');
  return response.data;
};

export const createTask = async (task) => {
  const response = await apiClient.post('/tasks', task);
  return response.data;
};

export const getTask = async (id) => {
  const response = await apiClient.get(`/tasks/${id}`);
  return response.data;
};
