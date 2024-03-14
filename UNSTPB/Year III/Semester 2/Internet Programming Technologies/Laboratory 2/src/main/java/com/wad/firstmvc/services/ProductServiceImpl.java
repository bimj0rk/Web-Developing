package com.wad.firstmvc.services;

import com.wad.firstmvc.domain.Product;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class ProductServiceImpl implements ProductService {
    List<Product> products = new ArrayList(List.of(
            new Product(13L, "ice cream", "food", 2.5),
            new Product(15L, "bike", "vehicle", 250.0),
            new Product(19L, "car", "vehicle", 25000.0))
    );


    @Override
    public List<Product> findAll() {
        return products;
    }

    @Override
    public void save(Product p) {
        products.add(p);
    }

    @Override
    public List<Product> searchProducts(String category, Double minPrice, Double maxPrice) {
        List<Product> result = new ArrayList<>();
        for (Product p : products) {
            if ((category == null || category == "" || p.getCategory().equals(category)) && (minPrice == null || p.getPrice() >= minPrice) && (maxPrice == null || p.getPrice() <= maxPrice)) {
                result.add(p);
            }            
        }
        return result;
    }
}
