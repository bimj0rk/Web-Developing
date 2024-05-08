package com.example.mvcproducts.services;

import com.example.mvcproducts.domain.Product;
import com.example.mvcproducts.exception.ResourceNotFoundException;
import com.example.mvcproducts.repositories.ProductRepository;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class ProductServiceImpl implements ProductService {
  private final ProductRepository productRepository;

  public ProductServiceImpl(ProductRepository productRepository) {
    this.productRepository = productRepository;
  }

  @Override
  public void saveAll(Iterable<Product> products) {
    productRepository.saveAll(products);
  }

  @Override
  public List<Product> findAll() {
    return productRepository.findAll();
  }

  @Override
  public Product save(Product product) {
            return productRepository.save(product);
  }

  public void deleteProductById(Long id) {
    productRepository.deleteById(id);
  }

  public Product updateProduct(Long id, Product productDetails) {
    Product product = productRepository.findById(id)
            .orElseThrow(() -> new ResourceNotFoundException("Product not found for this id :: " + id));

    product.setName(productDetails.getName());
    product.setPrice(productDetails.getPrice());
    product.setDescription(productDetails.getDescription());
    // Set other fields as needed

    final Product updatedProduct = productRepository.save(product);
    return updatedProduct;
  }

  public Optional<Product> findById(Long id) {
    return productRepository.findById(id);
  }

}
