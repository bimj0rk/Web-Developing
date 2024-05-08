package com.example.mvcproducts.services;

import com.example.mvcproducts.domain.Product;

import java.util.List;
import java.util.Optional;

public interface ProductService {
  void saveAll(Iterable<Product> products);
  List<Product> findAll();
  Product save(Product product);

  void deleteProductById(Long id);

  Product updateProduct(Long id, Product productDetails);

  Optional<Product> findById(Long id);
}
