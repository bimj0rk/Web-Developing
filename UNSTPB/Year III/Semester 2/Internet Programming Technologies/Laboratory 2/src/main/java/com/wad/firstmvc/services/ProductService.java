package com.wad.firstmvc.services;

import com.wad.firstmvc.domain.Product;

import java.util.List;

public interface ProductService {
    List<Product> findAll();
    void save(Product p);
    public List<Product> searchProducts(String category, Double minPrice, Double maxPrice);
}
