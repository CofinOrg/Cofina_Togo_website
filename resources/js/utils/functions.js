

export const goToDetail =  (id, router) => {
  router.push({ name: 'serviceDetail', params: { id: id } });
};
