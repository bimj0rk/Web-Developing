package com.example.mvcproducts.repositories;

import com.example.mvcproducts.domain.Product;
import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface ProductRepository extends CrudRepository<Product,Long> {
  @SuppressWarnings("null")
  List<Product> findAll();
}
