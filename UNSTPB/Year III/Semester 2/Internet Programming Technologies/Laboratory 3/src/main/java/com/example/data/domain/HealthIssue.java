package com.example.data.domain;

import jakarta.persistence.*;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.util.HashSet;
import java.util.Set;

@Entity
@Data
@NoArgsConstructor
public class HealthIssue {
    @Id
    @GeneratedValue
    private Long id;
    private String type;

    @ManyToOne
    private Patient patient;

    @OneToMany(mappedBy = "health_issue", cascade = CascadeType.PERSIST, fetch = FetchType.EAGER)
    private Set<HealthService> healthServices = new HashSet<>();

    public HealthIssue(String type) {
        this.type = type;
    }
}