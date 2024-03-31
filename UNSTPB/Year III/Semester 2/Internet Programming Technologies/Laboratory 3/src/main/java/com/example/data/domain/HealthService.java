package com.example.data.domain;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToOne;
import lombok.Data;
import lombok.NoArgsConstructor;

@Entity
@Data
@NoArgsConstructor
public class HealthService {
    @Id
    @GeneratedValue
    private Long id;
    private String description;
    private String type;

    @ManyToOne
    private HealthIssue healthIssue;

    @ManyToOne
    private MedicalEncounter medicalEncounter;

    public HealthService(String description, String type) {
        this.description = description;
        this.type = type;
    }
}