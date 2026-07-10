import api from './axios'

export const getHeroSliders = () => api.get('/hero-sliders').then(r => r.data)

export const getProducts = (params) => api.get('/products', { params }).then(r => r.data)

export const getProduct = (slug) => api.get(`/products/${slug}`).then(r => r.data)

export const getProductCategories = () => api.get('/product-categories').then(r => r.data)

export const getProductsByCategory = (slug) => api.get(`/products/category/${slug}`).then(r => r.data)

export const getCapabilities = () => api.get('/capabilities').then(r => r.data)

export const getInspectionEquipment = () => api.get('/inspection-equipment').then(r => r.data)

export const getIndustries = () => api.get('/industries').then(r => r.data)

export const getTestimonials = () => api.get('/testimonials').then(r => r.data)

export const getBlogs = (params) => api.get('/blogs', { params }).then(r => r.data)

export const getBlog = (slug) => api.get(`/blogs/${slug}`).then(r => r.data)

export const getGallery = () => api.get('/gallery').then(r => r.data)

export const getSettings = () => api.get('/settings').then(r => r.data)

export const submitContact = (data) => api.post('/contact', data).then(r => r.data)

export const submitQuoteRequest = (data) => api.post('/quote-request', data).then(r => r.data)
